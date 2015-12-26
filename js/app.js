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
  
  
   app.controller('SorteadoController', function($http){
	 var me = this;
	 this.pessoa = {nome:"",codigo:"",sorteado:""};
	 this.codigo = "";
	    this.getSorteado = function(){
		
		$http.get('sorteado/'+me.codigo).success(function(data){
		me.pessoa = data[0]; 
		});
		
	}
	
  });

})();