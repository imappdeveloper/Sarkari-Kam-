import React from 'react';
import DashboardLayout from '../components/DashboardLayout';

const AdminDashboard: React.FC = () => {
  return (
    <DashboardLayout>
      <div>
        <h1 className="text-3xl font-bold text-gray-900 mb-6">Admin Dashboard</h1>
        
        <div className="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
          <div className="bg-white rounded-lg shadow p-6">
            <h3 className="text-gray-600 text-sm font-medium">Total Users</h3>
            <p className="text-3xl font-bold text-gray-900 mt-2">1,234</p>
          </div>
          <div className="bg-white rounded-lg shadow p-6">
            <h3 className="text-gray-600 text-sm font-medium">Total Orders</h3>
            <p className="text-3xl font-bold text-gray-900 mt-2">567</p>
          </div>
          <div className="bg-white rounded-lg shadow p-6">
            <h3 className="text-gray-600 text-sm font-medium">Revenue</h3>
            <p className="text-3xl font-bold text-gray-900 mt-2">₹5,43,210</p>
          </div>
          <div className="bg-white rounded-lg shadow p-6">
            <h3 className="text-gray-600 text-sm font-medium">Active Vendors</h3>
            <p className="text-3xl font-bold text-gray-900 mt-2">89</p>
          </div>
        </div>

        <div className="bg-white rounded-lg shadow p-6">
          <h2 className="text-xl font-bold text-gray-900 mb-4">Recent Orders</h2>
          <table className="w-full text-left">
            <thead>
              <tr className="border-b">
                <th className="pb-3 font-medium text-gray-700">Order ID</th>
                <th className="pb-3 font-medium text-gray-700">Customer</th>
                <th className="pb-3 font-medium text-gray-700">Amount</th>
                <th className="pb-3 font-medium text-gray-700">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr className="border-b">
                <td className="py-3">ORD-001</td>
                <td className="py-3">John Doe</td>
                <td className="py-3">₹5,000</td>
                <td className="py-3"><span className="bg-green-100 text-green-800 px-2 py-1 rounded text-sm">Completed</span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </DashboardLayout>
  );
};

export default AdminDashboard;
