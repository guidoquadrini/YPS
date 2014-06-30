define(function(){
    return {
        pageGroups: [{"id":1,"name":"Default group","pages":[{"id":2,"name":"Acceso"},{"id":8,"name":"Registro de Pacientes"},{"id":1,"name":"Pagina Principal"},{"id":4,"name":"Listado de Pacientes"}]}],
        downloadLink: "http://ninja-services.cloudapp.net/html/htmlExport/download?shareCode=iiowdu&projectName=GUI Interfaces YPS",
        startupPageId: 0,

        forEachPage: function(func, thisArg){
        	for (var i = 0, l = this.pageGroups.length; i < l; ++i){
                var group = this.pageGroups[i];
                for (var j = 0, k = group.pages.length; j < k; ++j){
                    var page = group.pages[j];
                    if (func.call(thisArg, page) === false){
                    	return;
                    }
                }
            }
        },
        findPageById: function(pageId){
        	var result;
        	this.forEachPage(function(page){
        		if (page.id === pageId){
        			result = page;
        			return false;
        		}
        	});
        	return result;
        }
    }
});
