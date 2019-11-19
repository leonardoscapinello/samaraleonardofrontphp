"use strict";
var KTDefaultDatatableDemo = function () {
    return {
        init: function () {
            var a = $(".kt-datatable").KTDatatable({
                translate: {
                    records: {
                        processing: 'Carregando...',
                        noRecords: 'Nenhum registro encontrado',
                    },
                    toolbar: {
                        pagination: {
                            items: {
                                default: {
                                    first: 'Primeira Página',
                                    prev: 'Anterior',
                                    next: 'Próximo',
                                    last: 'Última Página',
                                    more: 'Mais páginas',
                                    input: 'Página atual: ',
                                    select: 'Selecione o tamanho da página'
                                },
                                info: 'Exibindo {{start}} - {{end}} de {{total}} registros'
                            },
                        }
                    }
                },
                data: {
                    type: "remote",
                    source: {
                        read: {
                            url: "https://api.leonardosamara.com:8443/categories",
                            method: 'GET',
                            headers: {
                                Authorization: "Bearer " + userSession.token
                            }
                        },
                    },
                    pageSize: 50,
                    serverPaging: !0,
                    serverFiltering: !0,
                    serverSorting: !0
                },
                columns: [
                    {
                        field: "category_name",
                        title: "Categoria",
                        autoHide: !1,
                        overflow: "visible",
                    }, {
                        field: "category_type",
                        title: "Finalidade",
                        type: "text",
                        autoHide: !1,
                        overflow: "visible",
                        template: function (t) {
                            if (t.is_credit) return "<span class=\"kt-badge kt-badge--success kt-badge--dot\"></span>\t\t<span class=\"kt-font-bold kt-font-success\">Crédito</span>";
                            return "<span class=\"kt-badge kt-badge--danger kt-badge--dot\"></span>\t\t<span class=\"kt-font-bold kt-font-danger\">Débito</span>";
                        }
                    }
                ]
            });
        }
    }
}
();
jQuery(document).ready(function () {
    KTDefaultDatatableDemo.init();
});