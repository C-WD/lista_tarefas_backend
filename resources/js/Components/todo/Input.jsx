import style from './Input.module.scss';
import { useRef } from 'react';

export default function input({retorno}){
    function pesquisa(e){
        e.preventDefault();
        retorno({
            nome: nome.current.value
        })
    }

    const nome = useRef(null);

    return (
        <div className={style.form}>
            <form>
                <input type="text" name="nome" id="nome" ref={nome}/>
                <button onClick={pesquisa}>Pesquisar</button>
            </form>
        </div>
    )
}
