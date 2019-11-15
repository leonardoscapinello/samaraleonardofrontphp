<template v-if="info">
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
