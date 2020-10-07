<template>
    <Layout>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Leads</h1>
                    <inertia-link :href="$route('lead.add')" class="btn btn-primary float-right">ADD &#x2795;</inertia-link>
                </div>
            </div>
            <div class="row">
            	<div class="col-md-12">
                    <table class="table table-bordered bg-white">
                    	<thead>
                    		<tr>
                    			<th>Id</th>
                    			<th>Name</th>
                    			<th>Email</th>
                    			<th>Phone Number</th>
                    			<th>Age</th>
                    			<th>Package</th>
                    			<th>Added On</th>
                                <th></th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		<tr v-for="lead in leads" :key="lead.id">
                    			<td>{{lead.id}}</td>
                    			<td><inertia-link :href="$route('lead.view',{lead:lead})">{{lead.name}}</inertia-link></td>
                    			<td>{{lead.email}}</td>
                    			<td>{{lead.phone}}</td>
                    			<td>{{lead.age}}</td>
                    			<td>{{lead.interested_package}}</td>
                    			<td>{{lead.added_by}}</td>
                                <td> <inertia-link :href="$route('lead.view',{lead:lead})" class="dropdown-item"> &#x27a1; </inertia-link> </td>
                    		</tr>
                    	</tbody>
                    </table>
                </div>
            </div>
        </div>
    </Layout>
</template>
<script>
import Layout from '../../shared/Layout.vue'
export default {
    components: {
        Layout
    },
    props:['leads'],
}

</script>
