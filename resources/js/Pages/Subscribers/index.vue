<template>
	<Layout>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Subscribers</h1>
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
                    			<th>Renewal On</th>
                                <th></th>
                    		</tr>
                    	</thead>
                    	<tbody>
                    		<tr v-for="subsciber in subscribers.data" :key="subsciber.id">
                    			<td>{{subsciber.id}}</td>
                    			<td><inertia-link :href="$route('lead.view',{lead:subsciber})">{{subsciber.name}}</inertia-link></td>
                    			<td>{{subsciber.email}}</td>
                    			<td>{{subsciber.phone}}</td>
                    			<td>{{subsciber.age}}</td>
                    			<td>{{subsciber.interested_package}}</td>
                    			<td>{{subsciber.renewal_date}}</td>
                                <td> <inertia-link href="#" class="dropdown-item"> &#x27a1; </inertia-link> </td>
                    		</tr>
                    	</tbody>
                    </table>
                    <pagination :links="subscribers.links"></pagination>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from '../../shared/Layout.vue'
import Pagination from '../../shared/Pagination.vue'
	export default {
		name:"SubsucriberIndex",
		components:{
			Layout,
			Pagination
		},
		props:{
			subscribers:Object,
		}
	}
</script>