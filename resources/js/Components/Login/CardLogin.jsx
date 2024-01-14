import estilo from './CardLogin.module.scss';
import { useForm } from '@inertiajs/react';

export default function CardLogin() {
    const { data, setData, post } = useForm({
        email: '',
        password: ''
    });

    function state(e) {
        e.preventDefault();
        post(route('login'));
    }

    return (
        <div className={estilo.formLogin}>
            <form onSubmit={state}>
                <h1>Login</h1>
                <label> Email <input type="text" name='email' value={data.email} onChange={e => setData('email', e.target.value)} /></label>
                <label> Senha <input type="password" name='password' value={data.password} onChange={e => setData('password', e.target.value)} /></label>
                <button>Entrar</button>
                <div>
                    <a href="/register">Registre-se</a><a href="/">Esqueceu sua senha?</a>
                </div>
            </form>
        </div>
    );
}
