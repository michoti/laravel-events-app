
import Card from '@/Components/Card';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head, router, usePage } from '@inertiajs/react';
import { HiOutlineArrowLeft, HiOutlineArrowRight  } from "react-icons/hi";

export default function Events() {
    const { events } = usePage().props;

    return (
        <GuestLayout>
            <Head title="Events" />
             <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-12 lg:px-8">
                    <div className='grid grid-cols-1 md:grid-cols-4 justify-center items-center gap-12 md:gap-2'>
                        {events.data.map((event) => (
                        <div key={event.id}>
                            <Card 
                                id={event.id}                           
                                src={event.image}
                                name={event.name}
                                venue={event.venue}
                                description={event.description} 
                            />
                        </div>
                        ))}
                    </div>

                    <div class="max-w-lg my-5 container flex justify-center mx-auto">
                    <div class="flex flex-row mx-auto">
                        {events.prev_page_url && (
                        <button type="button" onClick={() => router.visit(events.prev_page_url)} class="bg-gray-800 text-white rounded-l-md border-r border-gray-100 py-2 hover:bg-yellow-600 hover:text-white px-3">
                        <div class="flex flex-row align-middle">
                            <svg class="w-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <p class="ml-2">Prev</p>
                        </div>
                        </button>
                        )}
                        {events.next_page_url && (
                        <button type="button" onClick={() => router.visit(events.next_page_url)} class="bg-gray-800 text-white rounded-r-md py-2 border-l border-gray-200 hover:bg-yellow-600 hover:text-white px-3">
                        <div class="flex flex-row align-middle">
                            <span class="mr-2">Next</span>
                            <svg class="w-5 ml-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        </button>
                        )}
                    </div>
                    </div>





               </div>
            </div>
        </GuestLayout>
    );
}
