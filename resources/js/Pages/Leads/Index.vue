<template>
    <Layout>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Leads</h1>
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
                    			<th>DOB</th>
                    			<th>Package</th>
                    			<th>Added On</th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		<tr v-for="lead in leads" :key="lead.id">
                    			<td>{{lead.id}}</td>
                    			<td>{{lead.name}}</td>
                    			<td>{{lead.email}}</td>
                    			<td>{{lead.phone}}</td>
                    			<td>{{lead.dob}}</td>
                    			<td>{{lead.interested_package}}</td>
                    			<td>{{lead.added_by}}</td>
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
