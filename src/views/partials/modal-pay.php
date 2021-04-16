<div class="principal">
    <div class="modal-bg" onclick="closedModal()"></div>
    <div class="modal-container">
        <div class="modal-title">Adicionar Contas a Pagar</div>

        <div>
            <form method="get">
                <div class="item-responsive form-modal">
                    <label>
                        Venciemnto <input type="date" name="" id="">
                    </label>
                </div>
                <div class="item-responsive form-modal">
                    <label>
                        Descrição <input type="text" name="" id="">
                    </label>
                </div>
                <div class="item-responsive form-modal">
                    <label>
                        Tipo <select name="" id="">
                            <option value=""></option>
                            <option value="">Material</option>
                            <option value="">Gel</option>
                        </select>
                    </label>
                </div>
                <div class="item-responsive form-modal">
                    <label>
                        Valor <input type="text" name="" id="">
                    </label>
                </div>
                <div class="item-responsive form-modal">
                    <label>
                        Obs <input type="text" name="" id="">
                    </label>
                </div>
            </form>
        </div>

        <div class="modal-footer">
            <button class="cancelar" onclick="closedModal()">Cancelar</button>
            <button id="aceitar">Adicionar</button>
        </div>
    </div>
</div>