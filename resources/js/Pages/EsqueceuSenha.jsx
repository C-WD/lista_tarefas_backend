import CardEsqueceuSenha from "@/Components/EsqueceuSenha/CardEsqueceuSenha";
import estilo from './EsqueceuSenha.module.scss';
import Layout from "@/Layouts/Layout";

export default function EsqueceuSenha(){
    return (
        <Layout>
            <div className={estilo.esqueceuSenhaPage}>
                <div className={estilo.CardEsqueceuSenha}>
                    <CardEsqueceuSenha/>
                </div>
            </div>
        </Layout>
    )
}
