<template>
    <Layout>
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-12">
                    <h1 class="float-left">Packages</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            List Of Packages &#x1f4e6;
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush" v-if="active_packages.length > 0">
                                <li class="list-group-item" v-for="activePackage in active_packages" :key="activePackage.id">
                                    <inertia-link :href="$route('package.view',{package:activePackage})">{{activePackage.name}} ({{activePackage.number_of_days}})</inertia-link>
                                    <span class="float-right"><strong>{{activePackage.amount}}</strong>
                                    </span>
                                </li>
                            </ul>
                            <div v-else>No Package Added Yet. &#x1f645;</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                	<div class="card">
                		<div class="card-header">
                			Add New Package &#x1f4f0;
                		</div>
                		<div class="card-body">
                			<add-form :package-data="blankPackage" @packageAdded="handlePackageAdded"></add-form>
                		</div>
                	</div>
                </div>
            </div>
        </div>
    </Layout>
</template>
<script>
import Layout from '../../shared/Layout.vue'
import AddForm from './AddForm.vue'
export default {
    name: "PackageList",
    props: ['active_packages'],
    components: {
        Layout,
        AddForm
    },
    data(){
    	return {
    		blankPackage:{
                name:"",
                amount:"",
                number_of_days:"",
            }
    	}
    },
    methods:{
    	async handlePackageAdded(payload){
            let data = await this.$inertia.post('/packages/save',payload);
    	}
    }
}

</script>
