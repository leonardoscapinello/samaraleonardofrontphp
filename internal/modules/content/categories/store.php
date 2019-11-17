<template v-if="loader">
    <div class="row">
        <div class="offset-3"></div>
        <div class="col-lg-6">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            {{ category_name || 'Cadastrar Categoria' }}
                        </h3>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="kt-form kt-form--label-right" id="formElement" v-on:submit="store">

                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="title">Categoria:</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" v-model="category_name"
                                               name="category_name" id="category_name"
                                               placeholder="Ex: Alimentação">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="id_category">Tipo de Transação</label>
                                    <div class="col-lg-6">
                                        <select class="form-control bootstrap-select" id="transaction_type"
                                                name="transaction_type">
                                            <option value="credit" selected>Transações de Crédito</option>
                                            <option value="debit">Transações de Débito</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row">
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Portlet-->
        </div>
        <div class="offset-3"></div>
    </div>
</template>
<template v-else>
    <div class="row">
        <div class="offset-3"></div>
        <div class="col-xl-6 col-lg-6">
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-widget14">
                    <div class="kt-widget20__content kt-margin-b-40">

                        <div class="content-placeholder">
                            <div class="placeholder-block loads pb-2x"></div>
                        </div>

                        <br/>
                        <br/>

                        <div class="content-placeholder">
                            <div class="placeholder-block loads pb"></div>
                        </div>
                        <div class="content-placeholder">
                            <div class="placeholder-block loads pb"></div>
                        </div>

                        <br/>

                        <div class="content-placeholder">
                            <div class="placeholder-block loads pb"></div>
                        </div>
                        <div class="content-placeholder">
                            <div class="placeholder-block loads pb"></div>
                        </div>


                        <br/>

                        <div class="content-placeholder">
                            <div class="placeholder-block loads pb"></div>
                        </div>
                        <div class="content-placeholder">
                            <div class="placeholder-block loads pb"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="offset-3"></div>
    </div>
</template>
