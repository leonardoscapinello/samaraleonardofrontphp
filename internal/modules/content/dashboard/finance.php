<template v-if="info">
    <div class="row">
        <div class="col-xl-4 col-lg-4">
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-widget14">
                    <div class="kt-widget14__header">
                        <h3 class="kt-widget14__title">
                            Balanço do Mês
                        </h3>
                        <span class="kt-widget14__desc">Espelho dos valores em conta bancária</span>
                    </div>
                    <div class="kt-widget20__content kt-margin-b-40">

                        <div class="kt-widget20__number text-xl-left widget14__title" style="font-size:30px;">
                            {{ info.difference.formatMoney(2, "R$ ", ".", ",") }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4">
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-widget14">
                    <div class="kt-widget14__header">
                        <h3 class="kt-widget14__title">
                            Créditos
                        </h3>
                        <span class="kt-widget14__desc">Espelho dos valores em conta bancária</span>
                    </div>
                    <div class="kt-widget20__content kt-margin-b-40">


                        <div class="kt-widget20__number text-xl-left widget14__title" style="font-size:30px;">
                            {{ info.credits.formatMoney(2, "R$ ", ".", ",") }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4">
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-widget14">
                    <div class="kt-widget14__header">
                        <h3 class="kt-widget14__title">
                            Débitos
                        </h3>
                        <span class="kt-widget14__desc">Espelho dos valores em conta bancária</span>
                    </div>
                    <div class="kt-widget20__content kt-margin-b-40">

                        <div class="kt-widget20__number text-xl-left widget14__title" style="font-size:30px;">
                            {{ info.debits.formatMoney(2, "R$ ", ".", ",") }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
</template>
<template v-else>
    <div class="row">
        <?php for ($i = 0; $i < 3; $i++) { ?>
            <div class="col-xl-4 col-lg-4">
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-widget14">
                        <div class="kt-widget14__header">
                            <div class="content-placeholder">
                                <div class="placeholder-block loads"></div>
                            </div>
                            <div class="content-placeholder">
                                <div class="placeholder-block loads"></div>
                            </div>
                        </div>
                        <div class="kt-widget20__content kt-margin-b-40">

                            <div class="content-placeholder">
                                <div class="placeholder-block loads pb-2x"></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</template>
