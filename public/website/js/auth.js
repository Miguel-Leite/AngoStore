import { Api } from './services.js';

document.forms[0].addEventListener('submit',async (e)=> {
    e.preventDefault();
    const fd = new FormData(e.currentTarget);
    const { data, status } = await Api.post('conta/login',fd);
    if (data.success) {
        iziToast.success({
            title: 'Sucesso!',
            message: data.message,
            position: 'topRight'
          });
          setTimeout(()=>{
            location.assign("conta/login")
         },3000)
    } else {
        iziToast.error({
            title: 'Falha na autenticação!',
            message: data.message,
            position: 'topRight'
          });
    }
},false)