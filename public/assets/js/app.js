(function($, Backbone, Marionette ){
    'use strict';

    $('select').select2();

    // Toastr Configuration
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "positionClass": "toast-bottom-right",
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    window.App =  {
        Helpers: {},
        Models: {},
        Views: {
            Maintenance: {}
        },
        Collections: {}
    };

}(jQuery, Backbone, Marionette));
App.Helpers.Images = (function(App) {
    'use strict';

    function ImgToBase64(url, callback, outputFormat) {
        var canvas = document.createElement('canvas'),
            ctx = canvas.getContext('2d'),
            img = new Image;

            img.crossOrigin = 'Anonymous';
            img.onload = function() {
                canvas.height = img.height;
                canvas.width = img.width;
                ctx.drawImage(img,0,0);
                var dataURL = canvas.toDataURL(outputFormat || 'image/png');
                callback.call(this, dataURL);

                // Clean up
                canvas = null;
            };
        img.source = url;
    }

    return {
        ImgToBase64: ImgToBase64
    }
}(window.App));
App.Helpers.Table  = (function(App) {
    "use strict";

    var TableDynamic = function() {
        // Create reference to this instance
        var o = this;
    };
    var p = TableDynamic.prototype;

    // =========================================================================
    // INIT
    // =========================================================================

    p.initialize = function($el, $columns) {
        this._initDataTables($el, $columns);
    };

    // =========================================================================
    // DATATABLES
    // =========================================================================

    p._initDataTables = function($el, $columns) {
        if (!$.isFunction($.fn.dataTable)) {
            return;
        }

        // Init the demo DataTables
        this._createDataTable($el, $columns);
    };

    p._createDataTable = function($el, $columns) {
        var table = $el.DataTable({
            "dom": 'T<"clear">lfrtip',
            "ajax": $el.data('source'),
            "columns": $columns,
            "tableTools": {
                "sSwfPath": $el.data('swftools')
            },
            "order": [[1, 'asc']],
            "language": {
                "lengthMenu": '_MENU_ entries per page',
                "search": '<i class="fa fa-search"></i>',
                "paginate": {
                    "previous": '<i class="fa fa-angle-left"></i>',
                    "next": '<i class="fa fa-angle-right"></i>'
                }
            }
        });

        //Add event listener for opening and closing details
        var o = this;
        //$el.children('tbody').on('click', 'td.details-control', function() {
        //    var tr = $(this).closest('tr');
        //    var row = table.row(tr);
        //
        //    if (row.child.isShown()) {
        //        // This row is already open - close it
        //        row.child.hide();
        //        tr.removeClass('shown');
        //    }
        //    else {
        //        // Open this row
        //        row.child(o._formatDetails(row.data())).show();
        //        tr.addClass('shown');
        //    }
        //});
    };

    // =========================================================================
    // DETAILS
    // =========================================================================

    p._formatDetails = function(d) {
        // `d` is the original data object for the row
        return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">' +
            '<tr>' +
            '<td>Full name:</td>' +
            '<td>' + d.name + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Extension number:</td>' +
            '<td>' + d.extn + '</td>' +
            '</tr>' +
            '<tr>' +
            '<td>Extra info:</td>' +
            '<td>And any further details here (images etc)...</td>' +
            '</tr>' +
            '</table>';
    };

    // =========================================================================
    return p;
}(window.App));
App.Models.Allergy = (function (App) {
    'use strict';

    var Allergy = Backbone.Model.extend({
        default: {
            'type': '',
            'name': ''
        }
    });

    return Allergy;
}(window.App));
App.Models.Patient = (function (App) {
    'use strict';

    var Patient = Backbone.Model.extend({
        defaults: {
            'patient_no': '',
            'firstname': 'Ann',
            'lastname': 'Laurens',
            'middlename': 'M',
            'address': '795 Folsom Ave, San Francisco, CA 94107',
            'birthdate': '',
            'contactno': '567-890-1234',
            'email': 'ann@laurens.com',
            'picture': 'avatar9463a.jpg'
        }

    });

    return Patient;
}(window.App));
App.Models.Queue = (function (App) {
    'use strict';

    var Queue = Backbone.Model.extend({
        default: {
            'id': '',
            'arrival': '',
            'patient_no': '',
            'vitalsign_id': '',
            'reservation_type': ''
        }
    });

    return Queue;
}(window.App));
App.Collections.Patients = (function(App) {
    'use strict';

    var Patients = Backbone.Collection.extend({
        model: App.Models.PatientModel,
        url: '/api/v1/patients',
        parse: function(response) {
            return response.data;
        }
    });

    return Patients;
}(window.App));
App.Views.Appointments = (function(App) {
    'use strict';

    var List = Marionette.View.extend({
        el: $('.section-body'),

        initialize: function() {
            var elem = document.querySelector('#appointmentForm');
            elem.addEventListener('submit', _.bind(this.createAppointment, this));
        },

        render: function() {
            var template = _.template($('#appointment-table').html(), {});

            this.$el.html(template);

            return this;
        },

        onRender: function() {
            var $columns = [
                {
                    "class": 'details-control',
                    "orderable": false,
                    "data": null,
                    "defaultContent": ''
                },
                {"data": "id"},
                {"data": "patient_no"},
                {"data": "name"},
                {"data": "appointment_date"},
                {"data": "status"},
                {"data": "created_by"},
                {"data": "actions"}
            ];

            App.Helpers.Table.initialize($('#datatable2'), $columns);
        },

        createAppointment: function(e) {
            var self = this;
            var form = $('#appointmentForm');

            e.preventDefault();

            $.ajax({
                url: '/api/v1/appointments',
                type: 'POST',
                data: form.serialize(),
                success: function(data) {
                    if (data.status == 'success') {
                        toastr.success('Successfully created a new appointment', 'Success');
                        self.render();
                        self.triggerMethod('render');
                    } else {
                        toastr.error('Failed to add a new appointment', 'Error');
                    }
                },
                error: function() {
                    toastr.error('Failed to add a new appointment', 'Error');
                }
            });
        }
    });

    return {
        List: List
    }
}(window.App));
App.Views.Patients = (function(App) {
    'use strict';

    var Create = Marionette.View.extend({
        el: '#createForm',

        events: {
            'submit': 'createPatient'
        },

        createPatient: function(e) {
            e.preventDefault();

            var patient = this.collection.create({
                patient_no: this.$('#patient_no').val(),
                firstname: this.$('#firstname').val(),
                lastname: this.$('#lastname').val(),
                middlename: this.$('#middlename').val(),
                address: this.$('#address').val(),
                birthdate: this.$('#birthdate').val(),
                contactno: this.$('#contactno').val(),
                email: this.$('#email').val()
            }, { wait: true });

            console.log(patient);
            //this.collection.save();
        }
    });

    return {
        Create: Create
    }
}(window.App));
App.Views.Patients = (function(App) {
    'use strict';

        // Instance of the collection
        var patients = new App.Collections.Patients();

        // View
        var List = Marionette.View.extend({
            el: $('.section-body'),

            initialize: function() {
                this.collection.on('sync', this.render, this);

                var patientCreateForm = new App.Views.Patients.Create({ collection: patients });
            },

            collection: patients,

            render: function() {
                var template = Handlebars.compile($('#patient-place').html());
                var html = template({ patients: this.collection.toJSON() });
                this.$el.html(html);

                return this;
            },

            onBeforeRender: function() {
                var self = this;
                this.collection.fetch().then(function() {
                    self.render();
                    self.triggerMethod('render');
                });
            },

            onRender: function() {
                //console.log(this.collection.toJSON());
                console.log('rendered');
            }
        });

        return {
            List: List
        };
}(window.App));

App.Views.Queues = (function(App) {
    'use strict';

    var List = Marionette.View.extend({
        el: $('#content'),

        initialize: function() {

        },

        render: function() {
            var self = this;

            $.get('/assets/templates/queues/index.tpl.html', function(data) {
                var template = Handlebars.compile(data);

                $.get('/api/v1/patients?q=all', function(res) {

                    self.$el.html(template({data: res}));
                    self.triggerMethod('render');

                    var elem = document.querySelector('#createQueueForm');
                    elem.addEventListener('submit', _.bind(self.createQueue, self));

                    return this;
                });
            });
        },

        onRender: function() {
            //console.log(Tables);
            var $columns = [
                {
                    "class": 'details-control',
                    "orderable": false,
                    "data": null,
                    "defaultContent": ''
                },
                {"data": "queue_no"},
                {"data": "arrival"},
                {"data": "patient_id"},
                {"data": "patient_name"},
                {"data": "vitalsign"},
                {"data": "type"}
            ];

            App.Helpers.Table.initialize($('#datatable2'), $columns);
        },

        createQueue: function(e) {
            e.preventDefault();
            var self = this;

            var form = $('#createQueueForm');

            $.ajax({
                url: '/api/v1/queues',
                type: 'POST',
                data: form.serialize(),
                success: function(data) {
                    console.log(data);

                    if (data.status == 'success') {
                        toastr.success('Successfully added a new queue', 'Success');
                        self.render();
                        self.triggerMethod('render');
                    } else {
                        toastr.error('Opps! Theres something wrong', 'Error');
                    }
                },
                error: function(xhr, data, status) {
                    toastr.error('Opps! Theres something wrong', 'Error');
                }
            });
        }
    });

    return {
        List: List
    }
}(window.App));
App.Views.Maintenance.Allergies = (function(App) {
    'use strict';

    var List = Marionette.View.extend({
        el: $('.section-body'),

        initialize: function() {
            var elem = document.querySelector('#allergiesForm');
            elem.addEventListener('submit', _.bind(this.createAllergy, this));
        },

        render: function() {
            var template = _.template($('#allergy-table').html(), {});

            this.$el.html(template);

            return this;
        },

        onRender: function() {
            var $columns = [
                {
                    "class": 'details-control',
                    "orderable": false,
                    "data": null,
                    "defaultContent": ''
                },
                {"data": "id"},
                {"data": "type"},
                {"data": "name"},
                {"data": "created"},
                {"data": "updated"},
                {"data": "actions"}
            ];

            App.Helpers.Table.initialize($('#datatable2'), $columns);
        },

        createAllergy: function(e) {
            var self = this;
            var form = $('#allergiesForm');

            e.preventDefault();

            $.ajax({
                url: '/api/v1/maintenance/allergies',
                type: 'POST',
                data: form.serialize(),
                success: function(data) {
                    if (data.status == 'success') {
                        toastr.success('Successfully created a new allergy', 'Success');
                        self.render();
                        self.triggerMethod('render');
                    } else {
                        toastr.error('Failed to add a new allergy', 'Error');
                    }
                },
                error: function() {
                    toastr.error('Failed to add a new allergy', 'Error');
                }
            });
        }
    });

    return {
        List: List
    }
}(window.App));
App.Views.Maintenance.Diseases = (function(App) {
    'use strict';

    var List = Marionette.View.extend({
        el: $('.section-body'),

        initialize: function() {
            var elem = document.querySelector('#diseasesForm');
            elem.addEventListener('submit', _.bind(this.createDisease, this));
        },

        render: function() {
            var template = _.template($('#disease-table').html(), {});

            this.$el.html(template);

            return this;
        },

        onRender: function() {
            var $columns = [
                {
                    "class": 'details-control',
                    "orderable": false,
                    "data": null,
                    "defaultContent": ''
                },
                {"data": "id"},
                {"data": "name"},
                {"data": "created"},
                {"data": "updated"},
                {"data": "actions"}
            ];

            App.Helpers.Table.initialize($('#datatable2'), $columns);
        },

        createDisease: function(e) {
            e.preventDefault();
            var self = this;
            var form = $('#diseasesForm');

            $.ajax({
                url: '/api/v1/maintenance/diseases',
                type: 'POST',
                data: form.serialize(),
                success: function(data) {
                    if (data.status == 'success') {
                        toastr.success('Successfully added a disease', 'Success');
                        self.render();
                        self.triggerMethod('render');
                    } else {
                        toastr.error('Failed to add a new disease', 'Error');
                    }
                },
                error: function() {
                    toastr.error('Failed to add a new disease', 'Error');
                }
            });
        }
    });

    return {
        List: List
    }
}(window.App));
App.Views.Maintenance.Medicines = (function(App) {
    'use strict';

    var List = Marionette.View.extend({
        el: $('.section-body'),

        initialize: function() {
            var elem = document.querySelector('#medicinesForm');

            elem.addEventListener('submit', _.bind(this.createMedicine, this));
        },

        render: function() {
            var template = _.template($('#medicine-table').html(), {});

            this.$el.html(template);

            return this;
        },

        onRender: function() {
            var $columns = [
                {
                    "class": 'details-control',
                    "orderable": false,
                    "data": null,
                    "defaultContent": ''
                },
                {"data": "id"},
                {"data": "name"},
                {"data": "created"},
                {"data": "updated"},
                {"data": "actions"}
            ];

            App.Helpers.Table.initialize($('#datatable2'), $columns);
        },

        createMedicine: function(e) {
            e.preventDefault();

            var form = $('#medicinesForm');
            var self = this;

            $.ajax({
                url: '/api/v1/maintenance/medicines',
                type: 'POST',
                data: form.serialize(),
                success: function(data) {
                    if (data.status == 'success') {
                        toastr.success('Successfully created a new medicine', 'Success');
                        self.render();
                        self.triggerMethod('render');
                    } else {
                        toastr.error('Failed to create a new medicine', 'Error');
                    }
                },
                error: function() {
                    toastr.error('Failed to create a new medicine', 'Error');
                }
            });
        }
    });

    return {
        List: List
    }
}(window.App));
App.Views.Maintenance.Users = (function(App) {
    'use strict';

    var List = Marionette.View.extend({
        el: $('#content'),

        initialize: function() {

        },

        render: function() {
            //var template = _.template($('#user-table').html(), {});
            //
            //this.$el.html(template);
            //
            //return this;
            //
            var self = this;

            $.get('/assets/templates/users/users.tpl.html', function(data) {
                var template = Handlebars.compile(data);

                $.get('/api/v1/maintenance/users/roles', function(res) {

                    self.$el.html(template({data: res}));
                    self.triggerMethod('render');

                    var elem = document.querySelector('#usersForm');
                    elem.addEventListener('submit', _.bind(self.createUser, self));

                    return this;
                });
            });
        },

        onRender: function() {


            var $columns = [
                {
                    "class": 'details-control',
                    "orderable": false,
                    "data": null,
                    "defaultContent": ''
                },
                {"data": "username"},
                {"data": "name"},
                {"data": "role"},
                {"data": "created"},
                {"data": "updated"},
                {"data": "actions"}
            ];

            App.Helpers.Table.initialize($('#usersTable'), $columns);
        },

        createUser: function(e) {
            var self = this;
            var form = $('#usersForm');

            e.preventDefault();

            $.ajax({
                url: '/api/v1/maintenance/users',
                type: 'POST',
                data: form.serialize(),
                success: function(data) {
                    if (data.status == 'success') {
                        toastr.success('Successfully created a new user', 'Success');
                        self.render();
                        self.triggerMethod('render');
                    } else {
                        toastr.error('Failed to add a new user', 'Error');
                    }
                },
                error: function() {
                    toastr.error('Failed to add a new user', 'Error');
                }
            });
        }
    });

    return {
        List: List
    }
}(window.App));
(function(App) {
    'use strict';

    var AppRouter = Backbone.Router.extend({
        routes: {
            // Define url routes
            '': 'index',
            'maintenance/users': 'showUsers',
            'appointments': 'showAppointments',
            'patients': 'showPatients',
            'maintenance/allergies': 'showAllergies',
            'maintenance/diseases': 'showDiseases',
            'maintenance/medicines': 'showMedicines',

            // Default
            '*action': 'showQueues'
        },

        initialize: function() {
            Backbone.history.start({ pushState: false });
        },

        index: function() {

            var queueListView = new App.Views.Queues.List;
            queueListView.render();
        },

        showUsers: function() {

            var usersView = new App.Views.Maintenance.Users.List;
            usersView.render();
        },

        showAppointments: function() {
            var appointments = new App.Views.Appointments.List;
            appointments.render();
            appointments.triggerMethod('render');
        },

        showPatients: function() {
            var patientListView = new App.Views.Patients.List;
            patientListView.triggerMethod('before:render');
        },

        showAllergies: function() {
            var allergyView = new App.Views.Maintenance.Allergies.List;
            allergyView.render();
            allergyView.triggerMethod('render');
        },

        showDiseases: function() {
            var diseaseView = new App.Views.Maintenance.Diseases.List;
            diseaseView.render();
            diseaseView.triggerMethod('render');
        },

        showMedicines: function() {
            var medicineView = new App.Views.Maintenance.Medicines.List;
            medicineView.render();
            medicineView.triggerMethod('render');
        }

    });

    return new AppRouter;
}(window.App));