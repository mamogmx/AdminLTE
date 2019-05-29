<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<form>
<div class="box box-solid">
    <div class="box-header">
        <h2 class="box-title">Dati della Pratica</h2>
    </div>
    <div class="box-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                      <label for="numero-id">Numero Pratica</label>
                      <input type="text" class="form-control" name="numero" id="numero-id" placeholder="numero pratica" value="">
                </div>
                <div class="col-md-3">
                    <label for="data_presentazione-id">Data Presentazione</label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        <input type="text" class="form-control" data-plugins="datepicker" name="data_presentazione" id="data_presentazione-id" placeholder="data presentazione" value="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                      <label for="protocollo-id">Numero Protocollo</label>
                      <input type="text" class="form-control" name="protocollo" id="protocollo-id" placeholder="numero protocollo" value="">
                </div>
                <div class="col-md-6 datepicker">
                    <label for="data_protocollo-id">Data Protocollo</label>
                    <div class="input-group date">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        <input type="text" class="form-control" data-plugins="datepicker" name="data_protocollo" id="data_preotocollo-id" placeholder="data protocollo" value="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
</form>    