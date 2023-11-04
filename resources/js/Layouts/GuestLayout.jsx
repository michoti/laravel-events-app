import Footer from '@/Components/Footer';
import TopNavBar from '@/Components/TopNavBar';

export default function Guest({ children }) {

    return (
        <div className="min-h-screen bg-gray-100">
            <TopNavBar />                   
            <main>{children}</main>
            <Footer />
        </div>
    );
}
