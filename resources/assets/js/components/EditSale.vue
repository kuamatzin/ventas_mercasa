<template>
  <div>
    <div class="modal fade bs-example-modal-lg" id="modal-id" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Detalles de Venta</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-3">
                <carta-compromiso :ife="active_sale.client_id" :url_download="'/carta_compromiso/' + active_sale.id"></carta-compromiso>
              </div>
              <div class="col-md-3">
                <compra-venta :sale="active_sale" :url_download="'/contrato_compra_venta/' + active_sale.id"></compra-venta>
              </div>
              <div class="col-md-3">
                <!--<compra-venta-sin-enganche :sale="active_sale" :url_download="'/contrato_compra_venta_sin_enganche/' + active_sale.id"></compra-venta-sin-enganche>-->
              </div>
            </div>
            <br><br>
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="edit">
                  <div class="row">
                    <div class="col-md-4">
                      <label>Cliente: </label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" class="form-control input-edit" v-model="active_sale.client_name">
                    </div>
                  </div>
                </div>
                <div class="edit">
                  <div class="row">
                    <div class="col-md-4">
                      <label>NSS: </label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" class="form-control input-edit" v-model="active_sale.client_nss">
                    </div>
                  </div>
                </div>
                <div class="edit">
                  <div class="row">
                    <div class="col-md-4">
                      <label>IFE: </label>
                    </div>
                    <div class="col-md-8">
                      <input type="text" class="form-control input-edit" v-model="active_sale.client_id">
                    </div>
                  </div>
                </div>
                <div class="edit">
                  <div class="row">
                    <div class="col-md-4">
                      <label>Fecha de Nacimiento: </label>
                    </div>
                    <div class="col-md-8">
                      <input-fecha @updateDate="updateDate" date_type="'client_birthdate'" :original_date="active_sale.original_client_birthdate"></input-fecha>
                      <!--<input type="text" class="form-control input-edit" v-model="active_sale.client_birthdate">-->
                    </div>
                  </div>
                </div>
                <br>
                <hr>
                <div class="row">
                  <div class="col-md-6">
                    <div class="edit">
                      <div class="row">
                        <div class="col-md-4">
                          <label>Contrato Agua: </label>
                        </div>
                        <div class="col-md-8">
                          <select class="form-control input-edit" v-model="active_sale.water_contract">
                            <option value="Incluido"> Incluido</option>
                            <option value="Pagado"> Pagado</option>
                            <option value="Pendiente"> Pendiente</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="edit">
                      <div class="row">
                        <div class="col-md-4">
                          <label>Crédito: </label>
                        </div>
                        <div class="col-md-8">
                          <input type="text" class="form-control input-edit" v-model="active_sale.credit">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="edit">
                      <div class="row">
                        <div class="col-md-4">
                          <label>Nueva Precalificación: </label>
                        </div>
                        <div class="col-md-8">
                          <input type="text" class="form-control input-edit" v-for="pregrade in active_sale.new_pregrade">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="edit">
                      <div class="row">
                        <div class="col-md-4">
                          <label>Anticipo: </label>
                        </div>
                        <div class="col-md-8">
                          <input type="text" class="form-control input-edit" v-model="active_sale.advance">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="edit">
                      <div class="row">
                        <div class="col-md-4">
                          <label>Ahorro: </label>
                        </div>
                        <div class="col-md-8">
                          <input type="text" class="form-control input-edit" v-model="active_sale.saving">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="edit">
                      <div class="row">
                        <div class="col-md-4">
                          <label>Número Contrato: </label>
                        </div>
                        <div class="col-md-8">
                          <input type="text" class="form-control input-edit" v-model="active_sale.contract_number">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="edit">
                      <div class="row">
                        <div class="col-md-4">
                          <label>Comisión: </label>
                        </div>
                        <div class="col-md-8">
                          <input type="text" class="form-control input-edit" v-model="active_sale.commission">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="edit">
                      <div class="row">
                        <div class="col-md-4">
                          <label>Expediente: </label>
                        </div>
                        <div class="col-md-8">
                          <select name="status" class="form-control input-edit" v-model="active_sale.case_file">
                            <option value="1">Sin recibir</option>
                            <option value="2">Recibido</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="edit">
                      <div class="row">
                        <div class="col-md-4">
                          <label>Avaluo: </label>
                        </div>
                        <div class="col-md-8">
                          <select name="status" class="form-control input-edit" v-model="active_sale.appraisal_value">
                            <option value="1">Sin recibir</option>
                            <option value="2">Recibido</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="edit">
                      <div class="row">
                        <div class="col-md-4">
                          <label>PDF Resplado: </label>
                        </div>
                        <div class="col-md-8">
                          <input type="text" class="form-control input-edit" v-model="active_sale.pdf_backup">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="row">
                  <div class="col-md-6">
                    <div class="edit">
                      <div class="row">
                        <div class="col-md-4">
                          <label>Formato SIC: </label>
                        </div>
                        <div class="col-md-8">
                          <select name="status" class="form-control input-edit" v-model="active_sale.sic_format">
                            <option value="1">Sin recibir</option>
                            <option value="2">Recibido</option>
                            <option value="3">Entregado</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="edit">
                      <div class="row">
                        <div class="col-md-4">
                          <label>Status: </label>
                        </div>
                        <div class="col-md-8">
                          <select name="status" class="form-control input-edit" v-model="active_sale.status">
                            <option value="1">Carta Compromiso</option>
                            <option value="2">Constancia de Crédito</option>
                            <option value="3">Dictaminación</option>
                            <option value="4">Libertad de Gravamen</option>
                            <option value="5">Fecha Firma</option>
                            <option value="6">Fecha Entrega</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <br>
                <hr>

                <div class="edit">
                  <div class="row">
                    <div class="col-md-4">
                      <label>Carta Compromiso Fecha: </label>
                    </div>
                    <div class="col-md-8">
                      <input-fecha @updateDate="updateDate" date_type="'letter_commitment_subsidy_date'" :original_date="active_sale.original_letter_commitment_subsidy_date"></input-fecha>
                      <!--
                      <input type="text" class="form-control input-edit" v-model="active_sale.letter_commitment_subsidy_date">
                      -->
                    </div>
                  </div>
                </div>
                <div class="edit">
                  <div class="row">
                    <div class="col-md-4">
                      <label>Constancia Crédito Fecha: </label>
                    </div>
                    <div class="col-md-8">
                      <input-fecha @updateDate="updateDate" date_type="'credit_record_date'" :original_date="active_sale.original_credit_record_date"></input-fecha>
                      <!--
                      <input type="text" class="form-control input-edit" v-model="active_sale.credit_record_date">
                      -->
                    </div>
                  </div>
                </div>
                <div class="edit">
                  <div class="row">
                    <div class="col-md-4">
                      <label>Dictaminación Fecha: </label>
                    </div>
                    <div class="col-md-8">
                      <input-fecha @updateDate="updateDate" date_type="'judgment_date'" :original_date="active_sale.original_judgment_date"></input-fecha>
                      <!--
                      <input type="text" class="form-control input-edit" v-model="active_sale.judgment_date">
                      -->
                    </div>
                  </div>
                </div>
                <div class="edit">
                  <div class="row">
                    <div class="col-md-4">
                      <label>Libertad Gravamen Fecha: </label>
                    </div>
                    <div class="col-md-8">
                      <input-fecha @updateDate="updateDate" date_type="'freedom_tax_date'" :original_date="active_sale.original_freedom_tax_date"></input-fecha>
                      <!--
                      <input type="text" class="form-control input-edit" v-model="active_sale.freedom_tax_date">
                      -->
                    </div>
                  </div>
                </div>
                <div class="edit">
                  <div class="row">
                    <div class="col-md-4">
                      <label>Fecha de Firma: </label>
                    </div>
                    <div class="col-md-8">
                      <input-fecha @updateDate="updateDate" date_type="'sign_date'" :original_date="active_sale.original_sign_date"></input-fecha>
                      <!--
                      <input type="text" class="form-control input-edit" v-model="active_sale.sign_date">
                      -->
                    </div>
                  </div>
                </div>
                <div class="edit">
                  <div class="row">
                    <div class="col-md-4">
                      <label>Fecha de Entrega: </label>
                    </div>
                    <div class="col-md-8">
                      <input-fecha @updateDate="updateDate" date_type="'deliver_date'" :original_date="active_sale.original_deliver_date"></input-fecha>
                      <!--
                      <input type="text" class="form-control input-edit" v-model="active_sale.deliver_date">
                      -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" @click="updateSale">Guardar</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  </div>
</template>

<style>
  p {
    font-size: 1em;
  }
  .edit {
    padding-top: 5px;
  }
  .input-edit {
    margin-left: 1em;
  }
  .name {
    font-weight: bold;
    font-size: 1.1em;
    color: black;
  }
</style>


<script>

  import CartaCompromiso from './CartaCompromiso.vue';
  import CompraVenta from './CompraVenta.vue';
  import CompraVentaSinEnganche from './CompraVentaSinEnganche.vue';

  export default {
    props: ['active_sale'],
    components: { CartaCompromiso, CompraVenta, CompraVentaSinEnganche },
    methods: {
      updateSale() {
        let that = this;
        axios.put('sales/' + this.active_sale.id, {sale: this.active_sale}).then(
            ({data}) => {
              that.$emit('saleUpdated', data);
            }, error => {
              console.log("Error update sale")
            }
        );
      },
      updateDate(data){
        this.active_sale[data.date_type.substring(1, data.date_type.length-1)] = data.date;
      }
    }
  }
</script>