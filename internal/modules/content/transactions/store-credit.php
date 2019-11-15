<template v-if="categories">
    <div class="row">
        <div class="offset-3"></div>
        <div class="col-lg-6">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            {{ title || 'Cadastrar Transação de Crédito' }}
                        </h3>
                    </div>
                </div>
                <!--begin::Form-->
                <form class="kt-form kt-form--label-right" id="formElement" v-on:submit="store">

                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <h3 class="kt-section__title">1. Identificação:</h3>
                            <div class="kt-section__body">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="title">Nome do Registro:</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" v-model="title" name="title" id="title"
                                               placeholder="Ex: Almoço no Trabalho">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="id_category">Categoria:</label>
                                    <div class="col-lg-6">
                                        <select class="form-control bootstrap-select" id="id_category"
                                                name="id_category">
                                            <option
                                                    v-for="category in categories"
                                                    :key="category.id"
                                                    :value="category.id">
                                                {{ category.category_name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="description">Descrição</label>
                                    <div class="col-lg-6">
                                    <textarea type="text" class="form-control" v-model="description" name="description"
                                              id="description"
                                              placeholder="Ex: Comprei comida no restaurante para almoçar no escritório"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>

                            <h3 class="kt-section__title">2. Consumo:</h3>
                            <div class="kt-section__body">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="id_wallet">Carteira/Conta
                                        Bancária:</label>
                                    <div class="col-lg-6">
                                        <select class="form-control bootstrap-select" id="id_wallet"
                                                name="id_wallet">
                                            <option
                                                    v-for="wallet in wallets"
                                                    :key="wallet.id"
                                                    :value="wallet.id">
                                                {{ wallet.name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Valor (R$)</label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i
                                                            class="la la-dollar"></i></span></div>
                                            <input type="number" class="form-control money" placeholder="19,90"
                                                   step="0.01" pattern="[0-9]*" id="amount" name="amount"
                                                   v-model="amount">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Comunicação:</label>
                                    <div class="col-lg-6">
                                        <div class="kt-checkbox-inline">
                                            <label class="kt-checkbox">
                                                <input type="checkbox" disabled checked> Notificar por e-mail
                                                <span></span>
                                            </label>
                                            <p>Ao inserir uma nova transação, os usuários do sistema serão notificados
                                                por e-mail desse registro.</p>
                                        </div>
                                    </div>
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
