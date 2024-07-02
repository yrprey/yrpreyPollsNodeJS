    <br><br><div class="container mt-5">
        <h3>Gerenciamento de Enquetes</h3>
        <form id="pollForm">
            <div class="form-group">
                <label for="question">Pergunta da Enquete</label>
                <input type="text" class="form-control" id="question" required>
            </div>
            <div class="form-group">
                <label for="options">Opções (separadas por vírgula)</label>
                <input type="text" class="form-control" id="options" required>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color:#B71C1C">Criar Enquete</button>
        </form>
        <br><br>
        <h2 class="mt-5">Enquetes Existentes</h2>
        <ul class="list-group" id="managePollList">
            <!-- Enquetes serão carregadas aqui via Ajax -->
        </ul>
    </div>
    <br><br>