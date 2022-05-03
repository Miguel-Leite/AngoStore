import { Api } from './services.js';



document.forms[0].addEventListener('submit',async (e)=> {
    e.preventDefault();
    const fd = new FormData(e.currentTarget);
    const { data, status } = await Api.post(document.forms[0].action,fd);
    if (data.success) {
        iziToast.success({
            title: 'Sucesso!',
            message: data.message,
            position: 'topRight'
          });
        //   document.forms[0].reset()
    } else {
        iziToast.error({
            title: 'Falha na autenticação!',
            message: data.message,
            position: 'topRight'
          });
    }
},false)

document.forms[1].addEventListener('submit',async (e)=> {
    e.preventDefault();
    console.log('checked')
    // debugger
    const fd = new FormData(e.currentTarget);
    const { data, status } = await Api.post(document.forms[1].action,fd);
    if (data.success) {
        iziToast.success({
            title: 'Sucesso!',
            message: data.message,
            position: 'topRight'
          });
          document.forms[1].reset()
    } else {
        iziToast.error({
            title: 'Falha na autenticação!',
            message: data.message,
            position: 'topRight'
          });
    }
},false)