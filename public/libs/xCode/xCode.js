// jquery required 
class xCode 
{
	// ajax
	static ajax(method='get',url="",data={},debug=false)
	{
		this.debug=debug;
		this.method=method.toLowerCase();
		this.url=url;
		this.data=data;
		return this;
	}

	static then(callback = function(){return false;})
	{
		$.ajaxSetup(
		{
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
		});


		$.ajax(
		{
			url  : this.url,
			type : this.method,
			data : this.data,
			dataType: "json",
			success: function(response) 
			{	
				if(this.debug)
					console.log(response);
			  	return callback(response);				  	
			},
			error: function (request, error) 
			{
		        msg("ERROR",request.statusText,"error");
		    }
		});   
	}

}

$.fn.FormData = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};	


function msg_stop(tit,msg,func=null,icon='success')
{
	swal({
	  title: tit,
	  text: msg,
	  type: icon,
	  showCancelButton: false,
	  confirmButtonColor: "#8cd4f5",
	  confirmButtonText: "OK",
	  closeOnConfirm: true,
	  allowEscapeKey: false,
	  html: true,
	  showLoaderOnConfirm: true
	},
	function(){
	  func();
	});
}

function msg(tit,msg,icon=null)
{
    swal({
        title: tit,
        text: msg,
        type: icon,
        confirmButtonText: "Ok!",
        closeOnConfirm: false,
        html: true
    });
}

function sp_msg(tipo,msg)
{
	toastr.options = {
            "debug": false,
            "newestOnTop": false,
            "positionClass": "toast-bottom-right",
            "closeButton": true,
            "progressBar": true
	};

	switch(tipo) 
	{
    case 'error':
   		toastr.error(msg);
        break;
    case 'success':
        toastr.success(msg);
        break;
    case 'info':
        toastr.info(msg);
        break;	
	 case 'warning':
        toastr.warning(msg);
        break;		
	}
}

function msg_confirm(tit,msg,func = null,close=true)
{
   swal({
		  title: tit,
		  text: msg,
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Sim",
		  cancelButtonText: "Não",
		  closeOnConfirm: close,
		  html: true
		},
		function()
		{
		   func();
		});
}

function reload(refresh=true)
{
	var url = document.location.pathname;
	if(refresh)
		location.reload();
	else
      $("body").load(url);		
}

function reload_div(div)
{
    $(div).load(location.href+' '+div);
}

function load(url,refresh=true)
{
	if(refresh)
		location.href=url;
	else
       $("body").load(url);				
}

function send(method,url,JSON = {},token=null)
{
	var form = "<form hidden action='"+url+"' name='___FORM___POST' id='___FORM___POST' method='"+method+"'>";
	for (var campo in JSON) 
	{
	   form+="<input id='"+campo+"' name='"+campo+"'  value='"+JSON[campo]+"'>";
	}
	form+="<input id='_token' name='_token'  value='"+$('meta[name=_token]').attr('content')+"'>";
	form+="</form>";
	var form_ =  document.createElement("h1")
	form_.innerHTML = form;
	document.body.appendChild(form_);
	document.___FORM___POST.submit();
}
// global vars
var ______file_upload_stack______ = [];
