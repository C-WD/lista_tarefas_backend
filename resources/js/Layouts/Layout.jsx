import Header from "./Head";

export default function Layout({ children }) {
    return (
        <>
            <Header/>
            <main>{children}</main>
        </>
    );
}
