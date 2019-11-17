<template v-if="loader">
    <div class="row">
        <div class="offset-3"></div>
        <div class="col-lg-6">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            {{ name || 'Cadastrar Carteira' }}
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
                                    <label class="col-lg-3 col-form-label" for="title">Legenda:</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" v-model="name" name="name" id="name"
                                               placeholder="Ex: Banco brasileiro">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="id_category">Tipo do Recursos:</label>
                                    <div class="col-lg-6">
                                        <select class="form-control bootstrap-select" id="wallet_type"
                                                name="wallet_type">
                                            <option value="DC" selected>Conta Corrente</option>
                                            <option value="CC">Cartão de Crédito</option>
                                            <option value="MN">Dinheiro</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="title">Cor da Legenda:</label>
                                    <div class="col-lg-6">
                                        <input type="color" class="form-control" name="color" id="color"
                                               placeholder="#FF0000">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Ícone</label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <select class="form-control bootstrap-select" id="icon"
                                                    name="icon" style="font-family:'Font Awesome 5 Pro'">
                                                <option value="far fa-user">Usuário</option>
                                                <option value="far fa-piggy-bank">Cofrinho</option>
                                                <option value="far fa-university">Instituição Bancária</option>
                                                <option value="far fa-money-bill">Dinheiro</option>
                                                <option value="far fa-credit-card-blank">Cartão de Crédito</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <template v-if="is_credit">
                                <div class="kt-separator kt-separator--border-dashed kt-separator--space-lg"></div>

                                <h3 class="kt-section__title">2. Limite de Crédito:</h3>
                                <div class="kt-section__body">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Limite (R$)</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text"><i
                                                                class="la la-dollar"></i></span></div>
                                                <input type="number" class="form-control money" placeholder="1260,00"
                                                       step="0.01" pattern="[0-9]*" id="credit_limit"
                                                       name="credit_limit"
                                                       v-model="credit_limit">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label">Limite (R$)</label>
                                        <div class="col-lg-6">
                                            <div class="input-group">
                                                <select class="form-control bootstrap-select" id="due_day"
                                                        name="due_day">
                                                    <option value="" selected>Não há data de vencimento</option>
                                                    <?php for ($i = 1; $i < 32; $i++) { ?>
                                                        <option value="<?= $i ?>"><?= $i < 10 ? "0" . $i : $i ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>

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
