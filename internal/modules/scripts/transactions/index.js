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
                            url: "https://api.leonardosamara.com:8443/transactions",
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
                    field: "title",
                    autoHide: !1,
                    title: "Transação",
                    type: "text", template: function (t) {
                        var a = {
                            credit: {title: t.title, state: "success"},
                            debit: {title: t.title, state: "danger"},
                        };
                        return '<span class="kt-badge kt-badge--' + a[t.is_credit ? 'credit' : 'debit'].state + ' kt-badge--dot"></span>&nbsp;<span class="kt-font-bold kt-font-' + a[t.is_credit ? 'credit' : 'debit'].state + '">' + a[t.is_credit ? 'credit' : 'debit'].title + "</span>"
                    }
                }, {
                    field: "amount",
                    title: "Valor",
                    type: "number",
                    overflow: "visible",
                    autoHide: !1,
                    template: function (t) {
                        return t.amount.formatMoney(2, "R$ ", ".", ",");
                    }
                }, {
                    field: "wallet.name",
                    title: "Carteira",
                    type: "text"
                }, {
                    field: "category.category_name", title: "Categoria", type: "text"
                }, {
                    field: "user.name", title: "Proprietário", type: "text", template: function (t) {
                        return '<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--rounded kt-badge--bold kt-hidden-" style="background: #2d1e5f;color: #FFFFFF">' + t.user.name.split(' ')[0][0] + '</span>&nbsp;' + t.user.name.split(' ')[0];
                    }
                }, {
                    field: "created_at", title: "Registro", type: "date", format: "MM/DD/YYYY",
                    template: function (t) {
                        return formatDate(t.created_at);
                    }
                },
                    {
                        field: "Actions",
                        title: "Editar",
                        sortable: !1,
                        width: 110,
                        overflow: "visible",
                        autoHide: !1,
                        template: function (t) {
                            return '<div class="dropdown"><a href="transactions/edit/' + t.id + '" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete"><i class="la la-pencil"></i></a></div>'
                        }
                    }]
            });
        }
    }
}
();
jQuery(document).ready(function () {
    KTDefaultDatatableDemo.init();
});