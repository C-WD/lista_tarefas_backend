import estilo from './CardEsqueceuSenha.module.scss';
import { useForm } from '@inertiajs/react';
import Toastify from 'toastify-js';
import "toastify-js/src/toastify.css";
import { useEffect } from 'react';

export default function CardEsqueceuSenha() {
    const { data, setData, post, errors } = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    useEffect(() => {
        if (errors.email) {
            Toastify({
                text: errors.email,
                duration: 3000,
                style: {
                    background: "linear-gradient(to right, #D9534F, #D9534F)",
                    borderRadius: "10px",
                    maxWidth: "300px",
                    lineHeight: "1.5",
                    textAlign: "center",
                  },
            }).showToast();
        }
    }, [errors.email]);

    function state(e) {
        e.preventDefault();
        post(route('senha.email'));
    }


    return (
        <div className={estilo.formEsqueceuSenha}>
            <form onSubmit={state}>
                <h1>Recuperar Senha</h1>
                <p>Insira seu endereço de e-mail e enviaremos um link para redefinir sua senha.</p>
                <label> Email <input type="email" name='email' value={data.email} onChange={e => setData('email', e.target.value)} /></label>
                <button>Enviar Link de Confirmação</button>
            </form>
        </div>
    );
}
