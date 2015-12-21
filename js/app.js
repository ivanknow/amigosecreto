(function() {
  var app = angular.module('amigoSecreto', []);

  app.controller('PessoasController',['$http', function($http){
	 var me = this;
	 
	 this.pessoas = [];
	this.novo = {};
	this.add = function(){
		this.novo.id = 0;
		this.novo.sorteado = "";
		this.pessoas.push(this.novo);
		this.novo = {};
		
		
	}
	 
	 $http.get('/pessoas/').success(function(data){
		 me.pessoas = data;
		 
	 });
	 
	/* $http.post('/pessoas/cadastrar',{pessoa:'value'}).success(function(data){
		
		 
	 });*/
    
  });


}])();