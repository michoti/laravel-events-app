import { Link } from '@inertiajs/react'
import React from 'react'

function Complete() {
  return (
    <div className='container md:mt-10'>
      <div className="flex flex-col items-center">
        <div className="text-green-400">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
          </svg>
        </div>
        <div className="mt-3 text-xl font-semibold uppercase text-green-500">Congratulations!</div>
        <div className="text-lg font-semibold text-gray-500">
          Your Payment was successful.
        </div>
        <Link to='/'>
        <a className="mt-10">
          <button className="h-10 px-5 text-green-700 transition-colors duration-150 border-gray-300 rounded-lg focus:shadow-outline
          hover:bg-green-500 hover:text-green-100">Home</button>
        </a>
        </Link>
        
      </div>
    </div>
  )
}

export default Complete