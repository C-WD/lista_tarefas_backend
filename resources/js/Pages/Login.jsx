import CardLogin from "@/Components/Login/CardLogin";
import estilo from './Login.module.scss';
import Layout from "@/Layouts/Layout";

export default function Login2(){
    return (
        <Layout>
            <div className={estilo.loginPage}>
                <div className={estilo.CardLogin}>
                    <CardLogin/>
                </div>
            </div>
        </Layout>
    )
}
