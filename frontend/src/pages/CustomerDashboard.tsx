import React from 'react';
import DashboardLayout from '../components/DashboardLayout';

const CustomerDashboard: React.FC = () => {
  return (
    <DashboardLayout>
      <div>
        <h1 className="text-3xl font-bold text-gray-900 mb-6">Customer Dashboard</h1>
        
        <div className="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
          <div className="bg-white rounded-lg shadow p-6">
            <h3 className="text-gray-600 text-sm font-medium">Active Orders</h3>
            <p className="text-3xl font-bold text-gray-900 mt-2">3</p>
          </div>
          <div className="bg-white rounded-lg shadow p-6">
            <h3 className="text-gray-600 text-sm font-medium">Completed Orders</h3>
            <p className="text-3xl font-bold text-gray-900 mt-2">12</p>
          </div>
          <div className="bg-white rounded-lg shadow p-6">
            <h3 className="text-gray-600 text-sm font-medium">Wallet Balance</h3>
            <p className="text-3xl font-bold text-gray-900 mt-2">₹10,000</p>
          </div>
          <div className="bg-white rounded-lg shadow p-6">
            <h3 className="text-gray-600 text-sm font-medium">Total Spent</h3>
            <p className="text-3xl font-bold text-gray-900 mt-2">₹25,000</p>
          </div>
        </div>
      </div>
    </DashboardLayout>
  );
};

export default CustomerDashboard;
