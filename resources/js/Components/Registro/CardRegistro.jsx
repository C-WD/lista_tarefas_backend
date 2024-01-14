import estilo from './CardRegistro.module.scss';
import { useForm } from '@inertiajs/react';

export default function CardRegistro() {
    const { data, setData, post } = useForm({
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
    });

    function state(e) {
        e.preventDefault();
        post(route('register'));
    }

    return (
        <div className={estilo.formLogin}>
            <form onSubmit={state}>
                <h1>Registre-se</h1>
                <label> Nome <input type="text" name='name' value={data.name} onChange={e => setData('name', e.target.value)} /></label>
                <label> Email <input type="email" name='email' value={data.email} onChange={e => setData('email', e.target.value)} /></label>
                <label> Senha <input type="password" name='password' value={data.password} onChange={e => setData('password', e.target.value)} /></label>
                <label> Confirmação de Senha <input type="password" name='password_confirmation' value={data.password_confirmation} onChange={e => setData('password_confirmation', e.target.value)} /></label>
                <button>Registrar</button>
                <div>
                    <a href="/login">Já possui uma conta? Faça login</a>
                </div>
            </form>
        </div>
    );
}
