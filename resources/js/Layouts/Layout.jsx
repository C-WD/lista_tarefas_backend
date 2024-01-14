import Header from "./Head";
import React, { useState } from "react";

export default function Layout(props) {
    const [isLogged, setIsLogged] = useState(false);

    let token = () => {
        setIsLogged(true);
    }

    return (
        <>
            <Header logado={token} log={isLogged}/>
            <main>
                {props.children}
            </main>
        </>
    );
}
