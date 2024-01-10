import { useState, useEffect } from 'react';

import estilo from './TodoDetail.module.scss';
import Table from '@/Components/todo-detail/Table';
export default function todoDetail(props){
    const [todo, setTodo] = useState(null);
    const [error, setError] = useState(null);
    useEffect(() => {
        fetch(`/api/todo-detail/${props.id}`,
            {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if(data.error){
                    setError(data.error);
                    return;
                }
                setTodo(data);
            });
    }, [props.id]);
    return todo != null ? (
        <Table todo={todo} />
        ) : (
        <div className={estilo.todo}>
            <h1>Carregando...</h1>
            <p>Caso seja a primeira vez que você esteja acessando esta página, pode demorar um pouco para carregar.</p>
        </div>
    );
}
