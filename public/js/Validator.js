
document.querySelector("form").onsubmit = (event) => false;
console.log('validate');

class Validator {

    required = (str,user_message) => {
        let rules_message= user_message != undefined && user_message != '' ? user_message : "Trường này không được để trống"
     return    str.length != 0 ? undefined : rules_message;
    }
    min = (str,query,user_message) => {
        let lengths=query.split(':')[1];

        let rules_message= user_message != undefined && user_message != '' ? user_message : "Trường này phải tối thiểu " + lengths + " kí tự";
       return  str.length >= lengths ? undefined : rules_message;
    }
    isEmail = (str,user_message) => {
        const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        let rules_message = user_message != undefined && user_message != '' ? user_message : "Trường này phải là Email !";

        return re.test(str) ? undefined : rules_message;
    }
    same=(str,query,user_message)=>{
        let password=document.querySelector(query.split(":")[1]).value;
        let rules_message= user_message != undefined && user_message !='' ? user_message : "Mật khẩu nhập lại không trùng khớp";
        return str == password && str != ''  ? undefined : rules_message;
    }
    numeric=(value,user_message)=>{

        let rules_message= user_message != undefined && user_message !='' ? user_message : "Trường này phải là số";
        return Number.isInteger(parseInt(value)) ? undefined : rules_message;

    }




}

var checkRules = new Validator();
class Validate
{
    constructor(options) {
        let message=[];
        console.log("done");
        const checkMessage= (element,rules,user_message,value) =>{
            rules=rules.trim();

            if (rules.includes("min") && checkRules.min(value,rules,user_message) != undefined) {
                return checkRules.min(value,rules,user_message);
            }
            if (rules.includes('same') && checkRules.same(value,rules,user_message) != undefined){
                return checkRules.same(value,rules,user_message);
            }
            switch (rules){
                case "required":
                    if(checkRules.required(value,user_message) != undefined) return checkRules.required(value,user_message)
                    break;
                case 'isEmail':
                    if(checkRules.isEmail(value,user_message) != undefined) return checkRules.isEmail(value,user_message)
                    break;
                case 'numeric':
                    if (checkRules.numeric(value,user_message) != undefined) return checkRules.numeric(value,user_message);
            }
            return undefined;

        }

        $(document).on('click','button',function () {
            let danger = document.querySelectorAll("form p");
            danger.forEach(index => index.remove());


           message=[];



            options.forEach(function(index){
                let [element,rules,user_message]=index;
                let value=document.querySelector(element).value;
                let object = document.querySelector(element);
                message.push([element,checkMessage(element,rules,user_message,value)]);
            })

            console.log(message);
            message.forEach(function(index,i){
                let a=i++;



                let element=index[0];

                $(element).removeClass('warning');
                let content=index[1];
                if (content != undefined){
                    $(element).addClass('warning');

                $(element).closest('div').append('<p>'+content+'</p>');
                }
            })
            let error=message.find(index=>index[1] != undefined);
            if (error == undefined) document.querySelector('form').onsubmit=true;

        })




        let key = new Set();
        options.forEach(index => key.add(index[0]));
        key.forEach(index=>{
            $(index).blur(function () {
                // let danger = document.querySelector(index).parentNode;
                let danger=$(index).parent().children("p").remove();


                $(index).removeClass('warning');
                let message=[];
                options.forEach(item=>{
                  let [element,rules,user_message]=item;
                  if (element == index){
                      if (checkMessage(element,rules,user_message,$(element).val()) != undefined) message.push(checkMessage(element,rules,user_message,$(element).val()));
                  }
                })

             message.forEach(item=>{

                 $(index).closest('div').append('<p>'+item+'</p>')
                 $(index).addClass('warning');
             });
            })
        })




    }
}



