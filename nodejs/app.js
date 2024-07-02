const express = require('express');
const mysql = require('mysql');
const bodyParser = require('body-parser');
const session = require('express-session');
const cors = require('cors');

// Configurar conexão com o banco de dados MySQL
const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'poll_system'
});

// Conectar ao banco de dados
connection.connect((err) => {
  if (err) {
    console.error('Erro ao conectar ao MySQL:', err);
    return;
  }
  console.log('Conectado ao MySQL!');
});

// Criar uma instância do Express.js
const app = express();
const port = 3000;

// Middleware para processar corpo das requisições JSON
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

app.use(cors());

// Rotas
app.get('/', (req, res) => {
  res.send('API do Sistema de Enquetes');
});

// Endpoint para listar todas as enquetes
app.get('/list_polls', (req, res) => {
  connection.query('SELECT * FROM polls', (err, results) => {
    if (err) {
      console.error('Erro ao obter enquetes:', err);
      res.status(500).send('Erro ao listar enquetes');
      return;
    }
    res.json(results);
  });
});

app.get('/v2/user', (req, res) => {
  const poll_id = req.query.id;
  connection.query('SELECT * FROM users WHERE id = ?', [poll_id], (err, pollResults) => {
    if (err) {
      console.error('Erro ao obter enquete:', err);
      res.status(500).send('Erro ao obter enquete');
      return;
    }

    connection.query('SELECT * FROM users WHERE id = ?', [poll_id], (err, optionResults) => {
      if (err) {
        console.error('Erro ao obter opções da enquete:', err);
        res.status(500).send('Erro ao obter opções da enquete');
        return;
      }

      const poll = {
        question: pollResults[0].question,
        options: optionResults
      };
      
      res.json(poll);
    });
  });
});

app.get('/v1/user', (req, res) => {
  connection.query('SELECT * FROM users', (err, results) => {
    if (err) {
      console.error('Erro ao obter enquetes:', err);
      res.status(500).send('Erro ao listar enquetes');
      return;
    }
    res.json(results);
  });
});

// Endpoint para criar uma nova enquete
app.post('/create_poll', (req, res) => {
  const { question, options, id } = req.body;

  // Inserir a enquete na tabela polls
  connection.query('INSERT INTO polls (question, created_by) VALUES (?, ?)', [question, id], (err, result) => {
    if (err) {
      console.error('Erro ao inserir enquete:', err);
      res.status(500).send('Erro ao criar enquete');
      return;
    }

    const poll_id = result.insertId;

    // Verificar se options é um array; se não for, converter para array
    const optionsArray = Array.isArray(options) ? options : [options];

    // Array para armazenar as Promises das inserções nas opções
    const insertPromises = [];

    // Iterar sobre as opções e inserir na tabela options
    optionsArray.forEach(option => {
      insertPromises.push(new Promise((resolve, reject) => {
        connection.query('INSERT INTO options (poll_id, option_text) VALUES (?, ?)', [poll_id, option], (err, result) => {
          if (err) {
            console.error('Erro ao inserir opção:', err);
            reject(err);
          } else {
            resolve();
          }
        });
      }));
    });

    // Executar todas as inserções e retornar sucesso se todas forem bem-sucedidas
    Promise.all(insertPromises)
      .then(() => {
        res.send('success');
      })
      .catch(err => {
        console.error('Erro ao inserir opções:', err);
        res.status(500).send('Erro ao criar enquete');
      });
  });
});


// Endpoint para obter detalhes de uma enquete específica
app.get('/get_poll', (req, res) => {
  const poll_id = req.query.id;
  connection.query('SELECT * FROM polls WHERE id = ?', [poll_id], (err, pollResults) => {
    if (err) {
      console.error('Erro ao obter enquete:', err);
      res.status(500).send('Erro ao obter enquete');
      return;
    }

    connection.query('SELECT * FROM options WHERE poll_id = ?', [poll_id], (err, optionResults) => {
      if (err) {
        console.error('Erro ao obter opções da enquete:', err);
        res.status(500).send('Erro ao obter opções da enquete');
        return;
      }

      const poll = {
        question: pollResults[0].question,
        options: optionResults
      };
      
      res.json(poll);
    });
  });
});


app.get('/user', (req, res) => {
  const poll_id = req.query.id;
  connection.query('SELECT * FROM users WHERE id = ?', [poll_id], (err, pollResults) => {
    if (err) {
      console.error('Erro ao obter enquete:', err);
      res.status(500).send('Erro ao obter enquete');
      return;
    }

    connection.query('SELECT * FROM users WHERE id = ?', [poll_id], (err, optionResults) => {
      if (err) {
        console.error('Erro ao obter opções da enquete:', err);
        res.status(500).send('Erro ao obter opções da enquete');
        return;
      }

      const poll = {
        question: pollResults[0].question,
        options: optionResults
      };
      
      res.json(poll);
    });
  });
});
// Endpoint para registrar um voto em uma enquete
app.post('/vote', (req, res) => {
  const { poll_id, option_id, id } = req.body;
  // Simulando user_id a partir de uma sessão, que deve ser ajustado conforme a autenticação for implementada
  const user_id = 1; // Substituir pelo ID do usuário autenticado
  connection.query('INSERT INTO votes (poll_id, option_id, user_id) VALUES (?, ?, ?)', [poll_id, option_id, id], (err, result) => {
    if (err) {
      console.error('Erro ao registrar voto:', err);
      res.status(500).send('Erro ao registrar voto');
      return;
    }
    res.send('success');
  });
});

// Endpoint para obter resultados de uma enquete
app.get('/get_results', (req, res) => {
  const poll_id = req.query.id;

  connection.query('SELECT * FROM polls WHERE id = ?', [poll_id], (err, pollResults) => {
    if (err) {
      console.error('Erro ao obter enquete:', err);
      res.status(500).send('Erro ao obter enquete');
      return;
    }

    connection.query('SELECT options.option_text, COUNT(votes.id) AS votes FROM options LEFT JOIN votes ON options.id = votes.option_id WHERE options.poll_id = ? GROUP BY options.id', [poll_id], (err, result) => {
      if (err) {
        console.error('Erro ao obter resultados da enquete:', err);
        res.status(500).send('Erro ao obter resultados da enquete');
        return;
      }

      const results = {
        question: pollResults[0].question,
        results: result
      };

      res.json(results);
    });
  });
});

// Iniciar o servidor na porta especificada
app.listen(port, () => {
  console.log(`Servidor rodando em http://localhost:${port}`);
});
