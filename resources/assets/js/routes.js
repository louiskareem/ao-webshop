import VueRouter from 'vue-router';


let routes=[
{
	path:'/',
	component:require('./components/HomeComponent')
},
{
	path:'/products',
	component:require('./components/ProductsComponent')
},
{
	path:'/categories',
	component:require('./components/CategoriesComponent')
},
{
	path:'/orders',
	component:require('./components/OrdersComponent')
},
{
	path:'/login',
	component:require('./components/LoginComponent')
}
];

export default new VueRouter({
	routes,
	linkActiveClass: 'active'
});