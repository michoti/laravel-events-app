
import Card from '@/Components/Card';

import TextInput from '@/Components/TextInput';
import GuestLayout from '@/Layouts/GuestLayout';
import { Head, router, usePage } from '@inertiajs/react';
import { useState } from 'react';

export default function Events() {
    const { events } = usePage().props;
    const [query, setQuery] = useState('');
    const [searchEvents, setSearchEvents] = useState(events);

    const handleSearch = (e) => {
        e.preventDefault();
        if (query.trim() === '') {
            setSearchEvents([]);
            return;
        } else {
            const resp = router.get('/search/events', { q: query });
            setSearchEvents(resp.events);
        }
    };

    const displayEvents = searchEvents ? searchEvents : events.data ;


    return (
        <GuestLayout>
            <Head title="Events" />
                <div className="pt-3 max-w-md mx-auto flex items-center w-full h-12 rounded-lg focus-within:shadow-lg bg-white overflow-hidden">
                    
                    <TextInput
                        className="peer h-full w-full outline-none text-sm text-gray-700 pr-2"
                        type="text"
                        id="search"
                        placeholder="Search something.."
                        value={query}
                        onChange={(e) => setQuery(e.target.value)}
                    /> 
                    <div onClick={handleSearch} className="grid place-items-center h-full w-12 text-gray-300 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" className="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                </div>
             <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-12 lg:px-8">
                    <div className='grid grid-cols-1 md:grid-cols-4 justify-center items-center gap-12 md:gap-2'>
                        {searchEvents.data.map((event) => (
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
                        {searchEvents.prev_page_url && (
                        <button type="button" onClick={() => router.visit(searchEvents.prev_page_url)} class="bg-gray-800 text-white rounded-l-md border-r border-gray-100 py-2 hover:bg-yellow-600 hover:text-white px-3">
                        <div class="flex flex-row align-middle">
                            <svg class="w-5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <p class="ml-2">Prev</p>
                        </div>
                        </button>
                        )}
                        {searchEvents.next_page_url && (
                        <button type="button" onClick={() => router.visit(searchEvents.next_page_url)} class="bg-gray-800 text-white rounded-r-md py-2 border-l border-gray-200 hover:bg-yellow-600 hover:text-white px-3">
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
