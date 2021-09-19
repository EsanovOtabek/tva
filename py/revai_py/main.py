from rev_ai import apiclient
access_token = '02hV_qXuhImDltKJ20bpO92U-JyHDy-Uy-dE33KOB81N8VJxz2kbNc5R3dxqLVDvXifBKYGdvP3z6ZeVUTHPCebqD4rUQ'
job_id = 'your_job_id'

# Create client with your access token
client = apiclient.RevAiAPIClient(access_token)

# Get job details
job_details = client.get_job_details(job_id)
print(job_details)