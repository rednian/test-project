<template>
<section>
    <app-header></app-header>
   <section class="row">
   <div class="col-md-8 offset-md-2">
       <h1>Items Management Page</h1>
       <app-item></app-item>
   </div>
</section> 
</section>
</template>

<script>
import AppHeader from "./layouts/AppHeader";
import AppFooter from "./layouts/AppFooter";
import AppItem from "./AppItem";
    export default {
        components:{AppItem, AppHeader, AppFooter},
    }
</script>
