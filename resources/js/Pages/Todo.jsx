import Input from "@/Components/todo/Input";
import { useState, useEffect } from "react";
import estilo from './Todo.module.scss';

export default function Todo() {
    const [todo, setTodo] = useState({});
    const [todoData, setTodoData] = useState(null);

    useEffect(() => {
        if (todo.nome !== undefined) {
            fetch(`/api/todo/${todo.nome}`)
                .then(response => response.json())
                .then(data => {
                    const elementos = [];
                    data.forEach((elemento, index) => {
                        console.log(elemento['nome']);
                        elementos.push(
                            <tr key={index}>
                                <td>{index + 1}</td>
                                <td>{elemento['nome']}</td>
                                <td><a href={`/todo-detail/${elemento['id']}`}>Salvar</a></td>
                            </tr>
                        )
                    });
                    setTodoData(
                        <table className={estilo.table}>
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Nome</th>
                                </tr>
                            </thead>
                            <tbody>
                                {elementos}
                            </tbody>
                        </table>
                    );
                });
        }
    }, [todo]);

    return (
        <>
            {todo.nome === undefined ?
                <Input retorno={(novoTodo) => setTodo(novoTodo)} /> :
                todoData
            }
        </>
    );
}
