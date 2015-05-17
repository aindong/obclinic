App.Views.Patients = (function(App) {
    'use strict';

        // Instance of the collection
        var patients = new App.Collections.Patients();

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

        // View
        var List = Marionette.View.extend({
            el: $('#content'),

            initialize: function(options) {
                if (options.page) {
                    this.page = options.page;
                }

                this.collection.on('sync', this.render, this);

                var patientCreateForm = new Create({ collection: patients });
            },

            collection: patients,

            render: function() {
                var self = this;

                $.get('/assets/templates/patients/index.tpl.html', function(data) {
                    var template = Handlebars.compile(data);

                    // Pagination
                    var pagination = {
                        pages: [],
                        current: self.collection.pagination.current_page,
                        last: self.collection.pagination.total_page
                    };

                    for (var i = 1; i <= self.collection.pagination.total_page; i++) {
                        var tmp;

                        tmp = '<li><a href="#patients/' + i + '">' + i +'</a></li>';

                        if (i == self.collection.pagination.current_page) {
                            tmp = '<li class="active"><a href="#patients/' + i + '">' + i + ' <span class="sr-only">(current)</span></a></li>';
                        }

                        pagination.pages.push(tmp);
                    }

                    var html = template({ patients: self.collection.toJSON(), pagination: pagination });
                    self.$el.html(html);

                    App.Helpers.Loader.hide();
                    return self;
                });
            },

            onBeforeRender: function() {
                var self = this;
                this.collection.fetch({data: {page: this.page}}).then(function() {
                    self.triggerMethod('render');
                });
            },

            onRender: function() {
                //console.log(this.collection.toJSON());
                console.log('rendered');
                this.render();
            }
        });

        // Sigle page, details of a patient
        var Show = Marionette.View.extend({
            el: $('#content'),

            patient_no: null,

            initialize: function(options) {
                if (options.patient_no) {
                    this.patient_no = options.patient_no;
                }
            },

            render: function() {
                var self = this;

                $.get('/assets/templates/patients/show.tpl.html', function(data) {
                    var template = Handlebars.compile(data);

                    var html = template({});
                    self.$el.html(html);

                    $('select').select2();

                    self.triggerMethod('render');
                    App.Helpers.Loader.hide();
                });
            },

            onBeforeRender: function() {
                this.render();
            },

            onRender: function() {
                $('#createAllergyForm').on('submit', createAllergyPatient);
                $('#createPastMedicalHistoryForm').on('submit', createPastMedicalHistory);
                $('#createCurrentMedicationForm').on('submit', createCurrentMedicationForm);
                $('#createSocialHistoryForm').on('submit', createSocialHistoryForm);
                $('#createFamilyHistoryForm').on('submit', createFamilyHistoryForm);
            }

        });

        var createAllergyPatient = function(e) {
            e.preventDefault();

            var allergyList = $('#allergyList');
            var allergy = $('#allergies');

            var item = '<li>' + allergy.val() + '</li>';

            allergyList.append(item);
        };

        var createPastMedicalHistory = function(e) {
            e.preventDefault();

            var pastMedicalHistoryList = $('#pastMedicalHistoryList');
            var disease     = $('#disease');
            var diagnosed   = $('#diagnosed');

            var item = '<li>' + disease.val() + ' - ' + diagnosed.val() + '</li>'

            pastMedicalHistoryList.append(item);
        };

        var createCurrentMedicationForm = function(e) {
            e.preventDefault();

            var currentMedicationList = $('#currentMedicationList');
            var medicine    = $('#medicine');
            var dosage      = $('#dosage');
            var frequency   = $('#frequency');

            var item = '<li>' + medicine + ' ' + dosage + ' ' + frequency + '</li>';

            currentMedicationList.append(item);
        };

        var createSocialHistoryForm = function(e) {
            e.preventDefault();

            var socialHistoryList = $('#socialHistoryList');

            var item = '';

            socialHistoryList.append(item);
        };

        var createFamilyHistoryForm = function(e) {
            e.preventDefault();

            var familyHistoryList = $('#familyHistoryList');

            var item = '';

            familyHistoryList.append(item);
        };


        return {
            List: List,
            Show: Show
        };
}(window.App));