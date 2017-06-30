Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

new Vue({

    el: '#manage-vue',

    data: {
        items: [],
        pagination: {
            total: 0, 
            per_page: 2,
            from: 1, 
            to: 0,
            current_page: 1
        },
        offset: 4,
        formErrors:{},
        formErrorsUpdate:{},
        newItem : {'name':''},
        fillItem : {'name':'','id':''}
    },

    computed: {
        isActived: function () {
            return this.pagination.current_page;
        },
        pagesNumber: function () {
            if (!this.pagination.to) {
                return [];
            }
            var from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            var to = from + (this.offset * 2);
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            var pagesArray = [];
            while (from <= to) {
                pagesArray.push(from);
                from++;
            }
            return pagesArray;
        }
    },

    ready : function(){
        this.getvueproduct(this.pagination.current_page);
    },

    methods : {

        getvueproduct: function(page){
            axios.get('/unit?page='+page).then((response) => {
                console.log(response)
                this.$set('items', response.data.data.data);
                this.$set('pagination', response.data.pagination);
            });
        },

        createItem: function(){
            var input = this.newItem;
            axios.post('/unit',input).then((response) => {
                this.changePage(this.pagination.current_page);
                this.newItem = {'name':''};
                $("#create-item").modal('hide');
                toastr.success('Item Created Successfully.', 'Success Alert', {timeOut: 5000});
            }).catch((error) => {
                if (error.response.status == 422) {
                    this.formErrors = error.response.data
                } 
            });
        },

        deleteItem: function(item){
            this.$http.delete('/unit/'+item.id).then((response) => {
                this.changePage(this.pagination.current_page);
                toastr.success('Item Deleted Successfully.', 'Success Alert', {timeOut: 5000});
            });
        },

        editItem: function(item){
            this.fillItem.name = item.name;
            this.fillItem.id = item.id;
            this.fillItem.email = item.email;
            this.fillItem.level_id = item.level_id;
            $("#edit-item").modal('show');
        },

        updateItem: function(id){
            var input = this.fillItem;
            axios.put('/unit/'+id,input).then((response) => {
                this.changePage(this.pagination.current_page);
                // this.fillItem = {'name':'','email':'','level_id':'','id':''};
                $("#edit-item").modal('hide');
                toastr.error('Item Updated Successfully.', 'Success Alert', {timeOut: 5000});
            }, (response) => {
                this.formErrorsUpdate = response.data;
            });
        },

        changePage: function (page) {
            this.pagination.current_page = page;
            this.getvueproduct(page);
        }
    }
});