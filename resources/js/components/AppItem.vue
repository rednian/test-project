<template>
 <div>
     <div class="alert alert-danger" role="alert" v-if="errors">
            <div v-for="error in errors">{{ error[0] }}</div>
     </div>
      <section class="row">
      <div class="col-md-5 col-sm-5 col-xs-12">
         <form class="form-inline" @submit.prevent.enter="addItem">
            <input v-model="form.item_name" type="text" class="form-control col-sm-10 mr-1" placeholder="Enter item name and click add">
            
            <button type="submit" class="btn btn-secondary">Add</button>
        </form>
        <section class="border mt-4">
            <select  v-if="itemNotSelected" class="form-control" size="15" v-model="selected">
                <option :value="item.item_id" v-for="(item, index) in itemNotSelected" :key="item.item_id">{{ item.item_name }}</option>
            </select>
            <div v-else>No Added Item</div>
        </section>
      </div>
      <div class="col-md-2 col-sm-2 col-xs-12">
              <div class="text-center" style="padding-top:170px">
              <button type="button" @click="moveItem(0)" class="btn btn-secondary"> < </button>
              <button type="button" @click="moveItem(1)" class="btn btn-secondary"> > </button>
          </div>
 
          <!-- <div class="d-flex align-items-center flex-column "> -->
          
      </div>    
      <div class="col-md-5 col-sm-5 col-xs-12">
          <h2>Selected Items:</h2>
          <section class="border mt-4">
           <select class="form-control" v-if="itemNSelected" :size="15" v-model="selected">
                <option :value="item.item_id" v-for="(item, index) in itemNSelected" :key="item.item_id">{{ item.item_name }}</option>
            </select>
            <div v-else>No item selected</div>
        </section>
      </div>
  </section>
 </div>
</template>

<script>
export default {
  
  data () {
    return {

       form:{
            item_name: null,
       },
       selected: null,
        items: [],
        errors: null
    }
  },
  computed:{
      itemNotSelected(){
         return this.items.filter(function(item){
              if(!item.is_selected){ return item; }
          });
      },
      itemNSelected(){
         return this.items.filter(function(item){
              if(item.is_selected){ return item; }
          });
      }
  },
  methods:{
      async moveItem(value){
        var vm = this;
       var  item = {is_selected : value};
        await axios.patch(`/api/item/${vm.selected}`, item,{method:'post'}).then(function(response){
            if(response.status == 200){
                vm.getItems();
            }
        });
      },

     selectItem(item){
      
    },
    async getItems () { 
        var vm = this;
       await axios.get('/api/item').then(function(response){
            if(response.status == 200){
                vm.items = response.data;
            }
        });
    },
     async addItem(){
          var vm = this;
         await axios.post('/api/item', this.form).then(function(response){
              if(response.status == 200){
                  vm.items.push(response.data);
                  vm.form = {};

              }
          }).catch(function(e){
                // vm.errors = e;
               vm.errors = e.response.data.errors;
          });
      },
      
  },
  created () {
      this.getItems();
  },


}
</script>
<style scoped>
select{
    overflow:auto !important;
    min-height: 100px;
    /* width: 150px; */
}
</style>

</style>