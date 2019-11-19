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
                            url: "https://api.leonardosamara.com:8443/wallets",
                            method: 'GET',
                            headers: {
                                Authorization: "Bearer " + userSession.token
                            }
                        },
                    },
                    pageSize: 5,
                    serverPaging: !0,
                    serverFiltering: !0,
                    serverSorting: !0
                },
                layout: {scroll: !0, minHeight: null, footer: !1},
                sortable: !0,
                toolbar: {placement: ["bottom"], items: {pagination: {pageSizeSelect: [5, 10, 20, 30, 50]}}},
                search: {input: $("#generalSearch")},
                columns: [{
                    field: "name",
                    autoHide: !1,
                    title: "Conta Bancária",
                    type: "text"
                }, {
                    field: "account_value",
                    title: "Valor em conta",
                    type: "text",
                    overflow: "visible",
                    autoHide: !1,
                    template: function (t) {
                        return t.account_value.formatMoney(2, "R$ ", ".", ",");
                    }
                }, {
                    field: "wallet_type",
                    title: "Tipo",
                    type: "text",
                    template: function (t) {
                        var a = {
                            MN: {title: 'Dinheiro'},
                            CC: {title: 'Cartão de Crédito'},
                            DC: {title: 'Conta Corrente'}
                        };
                        return a[t.wallet_type].title
                    }
                }, {
                    field: "credit_limit",
                    title: "Limite", type: "text",
                    template: function (t) {
                        if (t.wallet_type === "CC") return t.credit_limit
                        return "-"
                    }
                }, {
                    field: "due_day",
                    title: "Vencimento",
                    type: "text",
                    template: function (t) {
                        if (t.wallet_type === "CC") return t.due_day
                        return "-"
                    }
                }, {
                    field: "best_day",
                    title: "Melhor dia",
                    type: "text",
                    template: function (t) {
                        if (t.wallet_type === "CC") return t.due_day - 12
                        return "-"
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