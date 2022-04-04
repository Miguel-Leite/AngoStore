/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */
import {Api} from './services.js'

$(".form-user-login").submit(function(e) {
    event.preventDefault();
    var form = $(this);
    if (form[0].checkValidity() === false) {
      event.stopPropagation();
    } else {
        try {
            const fd = new FormData(e.currentTarget)

            const sendData = async ()=> {
              const { data, status } = await Api.post('admin/login',fd);
              if (data.success) {
                iziToast.success({
                  title: 'Sucesso!',
                  message: data.message,
                  position: 'topRight'
                });
                setTimeout(()=>{
                   location.assign("home")
                },4000)
              } else {
                iziToast.error({
                  title: 'Falha na autenticação!',
                  message: data.message,
                  position: 'topRight'
                });
              }
            }
            sendData()
        } catch(e) {
            iziToast.error({
              title: 'Falha do sistema!',
              message: "Erro no servidor.",
              position: 'topRight'
            });
        }
    }
    form.addClass('was-validated');
    // sendData()
});

$(".form-user-create").submit(function(e) {
    e.preventDefault();

    var form = $(this);
    if (form[0].checkValidity() === false) {
        event.stopPropagation();
    } else {
        try {
            $('.btn-user-create').addClass('disabled')
            const fd = new FormData(e.currentTarget)
            const sendData = async ()=> {
              const { data, status } = await Api.post('admin/user/create',fd);
              if (data.success) {
                iziToast.success({
                  title: 'Sucesso!',
                  message: data.message,
                  position: 'topRight'
                });
                form[0].reset() 
                form.removeClass('was-validated');
                $('.btn-user-create').removeClass('disabled')
              } else {
                iziToast.error({
                  title: 'Falha na autenticação!',
                  message: data.message,
                  position: 'topRight'
                });
                $('.btn-user-create').removeClass('disabled')
              }
            }
            sendData()
        } catch(e) {
            iziToast.error({
              title: 'Falha do sistema!',
              message: "Erro no servidor.",
              position: 'topRight'
            });
        }
    }

    form.addClass('was-validated');
})

$(".form-user-update").submit(function(e) {
    e.preventDefault();

    var form = $(this);
    if (form[0].checkValidity() === false) {
        event.stopPropagation();
    } else {
        try {
            $('.btn-user-update').addClass('disabled')
            const fd = new FormData(e.currentTarget)
            const sendData = async ()=> {
              const { data, status } = await Api.post(form[0].action,fd);
              if (data.success) {
                iziToast.success({
                  title: 'Sucesso!',
                  message: data.message,
                  position: 'topRight'
                });
                form.removeClass('was-validated');
                $('.btn-user-update').removeClass('disabled')
              } else {
                iziToast.error({
                  title: 'Falha na atualização!',
                  message: data.message,
                  position: 'topRight'
                });
                $('.btn-user-update').removeClass('disabled')
              }
            }
            sendData()
        } catch(e) {
            iziToast.error({
              title: 'Falha do sistema!',
              message: "Erro no servidor.",
              position: 'topRight'
            });
        }
    }

    form.addClass('was-validated');
})

$(".form-category-create").submit(function(e) {
    e.preventDefault();

    var form = $(this);
    if (form[0].checkValidity() === false) {
        event.stopPropagation();
    } else {
        try {
            $('.btn-category-create').addClass('disabled')
            const fd = new FormData(e.currentTarget)
            const sendData = async ()=> {
              const { data, status } = await Api.post(form[0].action,fd);
              if (data.success) {
                iziToast.success({
                  title: 'Sucesso!',
                  message: data.message,
                  position: 'topRight'
                });
                form[0].reset() 
                form.removeClass('was-validated');
                $('.btn-category-create').removeClass('disabled')
              } else {
                iziToast.error({
                  title: 'Falha ao adicionar categoria!',
                  message: data.message,
                  position: 'topRight'
                });
                $('.btn-category-create').removeClass('disabled')
              }
            }
            sendData()
        } catch(e) {
            iziToast.error({
              title: 'Falha do sistema!',
              message: "Erro no servidor.",
              position: 'topRight'
            });
        }
    }

    form.addClass('was-validated');
})

$(".form-category-update").submit(function(e) {
    e.preventDefault();

    var form = $(this);
    if (form[0].checkValidity() === false) {
        event.stopPropagation();
    } else {
        try {
            $('.btn-category-update').addClass('disabled')
            const fd = new FormData(e.currentTarget)
            const sendData = async ()=> {
              const { data, status } = await Api.post(form[0].action,fd);
              if (data.success) {
                iziToast.success({
                  title: 'Sucesso!',
                  message: data.message,
                  position: 'topRight'
                });
                form.removeClass('was-validated');
                $('.btn-category-update').removeClass('disabled')
              } else {
                iziToast.error({
                  title: 'Falha na atualização!',
                  message: data.message,
                  position: 'topRight'
                });
                $('.btn-category-update').removeClass('disabled')
              }
            }
            sendData()
        } catch(e) {
            iziToast.error({
              title: 'Falha do sistema!',
              message: "Erro no servidor.",
              position: 'topRight'
            });
        }
    }

    form.addClass('was-validated');
})