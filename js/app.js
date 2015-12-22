(function() {
  var app = angular.module('amigoSecreto', []);

  app.controller('PessoasController', function($http){
	 var me = this;
	 
	this.pessoas = [];
	this.novo = {};
	this.codigo = "";
	this.add = function(){
		this.novo.id = 0;
		this.novo.sorteado = "";
		
		$http.post('cadastrar',{"nome":this.novo.nome}).success(function(data){
		me.codigo = "Codigo:"+data.codigo; 
		 me.pessoas = data.pessoas; 
		});
		
		this.novo = {};
		
	}
	
	this.buscar = function(){
		$http.get('buscar').success(function(data){
		 me.pessoas = data; 
	 });
	};
	
	
	
	 
	this.buscar();
    
  });

})();