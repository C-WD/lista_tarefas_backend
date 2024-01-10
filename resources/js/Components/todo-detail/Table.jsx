import estilo from './Table.module.scss';

export default function Table({todo}){
    const elementos = [];
    todo.map((elemento, index) => {
        console.log(elemento);
        if(elemento._class == "chapter"){
            elementos.push(
                <tr key={index} className={estilo.chapter}>
                    <td>{elemento.title}</td>
                    <td>{elemento.content_summary}</td>
                </tr>
            )
        }else if(elemento._class == "lecture"){
            elementos.push(
                <tr key={index} className={estilo.lecture}>
                    <td>{elemento.title}</td>
                    <td>{elemento.content_summary}</td>
                </tr>
            )
        }
    })
    return (
        <>
        {elementos.length > 0 ? (
            <table className={estilo.table}>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Duração</th>
                    </tr>
                </thead>
                <tbody>
                    {elementos}
                </tbody>
            </table>
            ) : <p>Nenhum capítulo encontrado</p>
        }
        </>
    );
}
