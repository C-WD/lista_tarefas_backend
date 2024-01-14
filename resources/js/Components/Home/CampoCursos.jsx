import estilo from './CampoCursos.module.scss';

export default function CampoCursos(){
    return(
        <div className={estilo.CampoCursos}>
            <div>
                <div>
                    <a href="/">Docker para Desenvolvedores (com Docker Swarm e Kubernetes)</a>
                </div>
                <div>
                    <p>0%</p>
                </div>
                <div>
                    <p>12 horas</p>
                </div>
                <div>
                    <p>Em espera</p>
                </div>
                <div>
                    <p>1 Hora</p>
                </div>
                <div>
                    <a href="/">Link</a>
                </div>
                <div>
                    <button>Editar</button>
                    <button>Excluir</button>
                </div>
            </div>
        </div>
    );
}
