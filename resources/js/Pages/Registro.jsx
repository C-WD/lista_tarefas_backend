import CardRegistro from '@/Components/Registro/CardRegistro';
import estilo from './Registro.module.scss';
import Layout from "@/Layouts/Layout";

export default function Login2(){
    return (
        <Layout>
            <div className={estilo.registro}>
                <CardRegistro/>
            </div>
        </Layout>
    )
}
