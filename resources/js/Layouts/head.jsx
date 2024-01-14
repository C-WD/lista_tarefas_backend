import estilo from "./Head.module.scss";
import { useEffect } from "react";
import { usePage } from "@inertiajs/react";
import propTypes from "prop-types";

export default function Header({logado, log}){
    Header.propTypes = {
        logado: propTypes.func,
        log: propTypes.bool
    }

    const { auth } = usePage().props;

    useEffect(() => {
        if(auth.user){
            logado(true);
        }
    }, [auth]);
    return (
        <div className={estilo.head}>
            <div>
                <div>
                    <a href="/">Organizador de Estudos</a>
                </div>
            </div>
            <div></div>
            <div>
            </div>
        </div>
    )
}
