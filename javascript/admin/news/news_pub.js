/**
 * @author sauger
 */
var category_count = 0;

function str_length(str){
	//return   str.replace(/[^\x00-\xff]/g,"**").length;
	 var i;   
    var len;   
    len = 0;   
    for (i=0;i<str.length;i++)   
    {   
        if (str.charCodeAt >255) len+=2; else len++;   
    }   
    return len;  
}

 function remove_hmtl_tag(str) 
{ 
 	return str.replace(/<\/?.+?>/g,"");//去掉所有的html标记 
} 


